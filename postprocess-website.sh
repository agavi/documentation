#!/bin/sh
PROJ_DIR=`pwd`
TEMP_DIR=/tmp

# Go over the html files and cut off the doctype crap, dita XSLT processor ignores standalone attributes

cd $PROJ_DIR

rm -rf website-out
mkdir website-out
cp -r html-out website-out/tmp

for i in `find website-out/tmp/topics -name '*.html'` ; 
	do echo Postprocessing $i ; 
	sed -i '.bak' -e '1,/^$/ d' -e '/<br id="endmain"/,$ d'  -e's|src="\.\./images|src="images/tutorial|g' $i; 
	echo '</div>' >> $i ; 
done

# Flatten TOC links & cut out HTML structure

lines=`wc -l website-out/tmp/index.html | awk '{print $1}' `
start=`expr $lines`

echo '<ol class="thirdlevel left">' > html-out/toc.html
sed -e '1,7 d' \
    -e "$start,$ d" \
    -e 's|href="topics/tutorial|href="documentation/tutorial|g' \
    -e 's|href="topics/concepts|href="documentation/tutorial|g' \
    -e 's|href="topics/reference|href="documentation/tutorial|g' \
    -e 's|<ul>|<ol>|g' \
    -e 's|</ul>|</ol>|g' \
    website-out/tmp/index.html  >> website-out/tmp/toc.html
    
# Correct the image links
find website-out/tmp -name '*.html' -exec sed -i '.bak' -e 's|src="\.\./images|src="images/tutorial|g' {} \;
find website-out/tmp -name '*.bak' -delete

echo "Building website template structure"
TEMPLATES_TARGET=website-out/website/templates
IMAGES_TARGET=website-out/website/images
STAGES_TARGET=website-out/website/stages
mkdir -p $TEMPLATES_TARGET
mkdir -p $IMAGES_TARGET
mkdir -p $STAGES_TARGET
mv website-out/tmp/toc.html $TEMPLATES_TARGET
mv website-out/tmp/topics/tutorial/* $TEMPLATES_TARGET
mv website-out/tmp/topics/reference/* $TEMPLATES_TARGET
mv website-out/tmp/topics/images/* $IMAGES_TARGET
mv website-out/tmp/stages/* $STAGES_TARGET

rm -rf website-out/tmp

