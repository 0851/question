mk = rm -rf upx/$(1)$(2)/$(3) \
&& mkdir -p upx/$(1)$(2) \
&& mkdir -p build/$(1)$(2) \
&& CGO_ENABLED=0 GOOS=$(1) GOARCH=$(2) go build -ldflags '-w -s' -o build/$(1)$(2)/$(3) \
&& upx -9 -o upx/$(1)$(2)/$(3) build/$(1)$(2)/$(3)

qs:
	rm -rf build
	rm -rf upx
	$(call mk,linux,mips,$@)
	$(call mk,linux,386,$@)
	$(call mk,linux,arm64,$@)
	$(call mk,linux,amd64,$@)
	$(call mk,darwin,amd64,$@)
	$(call mk,windows,386,$@.exe)
	$(call mk,windows,amd64,$@.exe)
	tar -czvf build.tar.gz -C build ./
	tar -czvf upx.tar.gz -C upx ./
	rm -rf build
	rm -rf upx
	git add .
	git commit -am 'build...'
	git push