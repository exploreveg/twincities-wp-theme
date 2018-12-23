#!/bin/bash

pushd bootswatch
grunt swatch:exploreveg
popd

cp bootswatch/exploreveg/bootstrap.css css/compiled-style.css

if [ ! -d fonts ]; then
    mkdir fonts
fi
cp ./bootswatch/bower_components/bootstrap/dist/fonts/* fonts

cat bootswatch/bower_components/bootstrap/dist/js/bootstrap.js \
    js/bootstrap-lightbox.js \
    js/the-bootstrap.js \
    js/exploreveg.js \
    > js/compiled-js.js
