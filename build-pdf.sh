#!/bin/sh

PROJ_DIR=`pwd`
TEMP_DIR=/tmp

cd $DITA_HOME

# Get the absolute path of DITAOT's home directory
DITA_DIR="`pwd`"
export ANT_OPTS="-Xmx512m $ANT_OPTS"
export ANT_HOME="$DITA_DIR"/tools/ant
export PATH="$DITA_DIR"/tools/ant/bin:"$PATH"

NEW_CLASSPATH="$DITA_DIR/lib:$DITA_DIR/lib/dost.jar:$DITA_DIR/lib/resolver.jar:$DITA_DIR/lib/fop.jar:$DITA_DIR/lib/avalon-framework-cvs-20020806.jar:$DITA_DIR/lib/batik.jar:$DITA_DIR/lib/xalan.jar:$DITA_DIR/lib/xercersImpl.jar:$DITA_DIR/lib/xml-apis.jar:$DITA_DIR/lib/icu4j.jar"
if test -n "$CLASSPATH"
then
export CLASSPATH="$NEW_CLASSPATH":"$CLASSPATH"
else
export CLASSPATH="$NEW_CLASSPATH"
fi

# Render the deliverable

ant -Ddita.dir=$DITA_DIR -Dproject.dir=$PROJ_DIR -f $PROJ_DIR/build/agavitutorial_pdf.xml -logger org.dita.dost.log.DITAOTBuildLogger $1 -debug
