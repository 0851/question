package main

import (
	"bytes"
	"fmt"
	"os"
	"strings"
	"text/template"

	"github.com/tealeg/xlsx"
)

func check(e error) {
	if e != nil {
		panic(e)
	}
}
func checkFileIsExist(filename string) bool {
	var exist = true
	if _, err := os.Stat(filename); os.IsNotExist(err) {
		exist = false
	}
	return exist
}

func Sub(a, b int) int {
	return a - b
}

func main() {
	l := len(os.Args)
	var excelFileName string = "question.xlsx"
	var output string = "question.php"

	if l >= 2 {
		excelFileName = os.Args[1]
	}
	if l >= 3 {
		output = os.Args[2]
	}

	type Item struct {
		Answer   string
		Question string
		Choose   []string
	}

	var datas []Item

	xlFile, err := xlsx.OpenFile(excelFileName)

	if err != nil {
		fmt.Printf("open failed: %s\n", err)
	}
	for _, sheet := range xlFile.Sheets {
		for _, row := range sheet.Rows {
			cellLen := len(row.Cells)
			if cellLen < 4 {
				panic("cell length is must greater than 4")
			}
			var item Item
			var choose []string
			for i, cell := range row.Cells {
				text := cell.String()
				text = strings.TrimSpace(text)
				if i == 0 {
					item.Answer = text
				} else if i == 1 {
					item.Question = text
				} else {
					if len(text) != 0 {
						choose = append(choose, text)
					}
				}
			}
			item.Choose = choose
			datas = append(datas, item)
		}
	}

	fmt.Println(datas)

	tepl := `
<?php
$questions = [{{ $len := len . }}{{ $last := sub $len 1}}{{ range $i, $item := . }}
	[
		"answer" => "{{ $item.Answer }}",
		"question" => "{{ $item.Question }}",
		"choose" => [{{ $lent := len $item.Choose }}{{ $lastt := sub $lent 1}}{{ range $index, $value := $item.Choose }}
			"{{ $value }}"{{ if lt $index $lastt }},{{ end }}{{ end }} 
		]
	]{{ if lt $i $last }},{{ end }}{{ end }} 
];

$rand_keys = array_rand($questions, 10);

$items = array_map(function ($item) use ($questions) {
  return $questions[$item];
}, $rand_keys);


echo json_encode($items);

?>`

	tmpl, err := template.New("test").Funcs(template.FuncMap{"sub": Sub}).Parse(tepl)

	var tpl bytes.Buffer

	if err := tmpl.Execute(&tpl, datas); err != nil {
		check(err)
	}

	result := tpl.String()

	f, err := os.Create(output) //创建文件
	check(err)
	defer f.Close()
	n, err := f.WriteString(result) //写入文件(字节数组)
	fmt.Printf("写入 %d 个字节n, %s", n, result)
	f.Sync()

}
