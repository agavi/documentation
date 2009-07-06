#!/bin/bash

export DITA_DIR=`pwd`/DITA-OT1.5

export ANT_HOME="$DITA_DIR/tools/ant/"
CLASSPATH="$DITA_DIR/lib:$DITA_DIR/lib/dost.jar:$DITA_DIR/lib/resolver.jar:$DITA_DIR/lib/fop.jar:$DITA_DIR/lib/avalon-framework-cvs-20020806.jar:$DITA_DIR/lib/batik.jar:$DITA_DIR/lib/xalan.jar:$DITA_DIR/lib/xercersImpl.jar:$DITA_DIR/lib/xml-apis.jar:$DITA_DIR/lib/icu4j.jar:$DITA_DIR/lib/saxon/saxon9.jar:$DITA_DIR/lib/saxon/saxon9-dom.jar:$CLASSPATH" 
export CLASSPATH

ant -f build/agavi-guide.xml $1
