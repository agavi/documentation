Agavi Tutorial - alpha version
==========================================================

To render this tutorial into a deliverable, you need to do the following:

1) Install DITA OTK on your box. You will need sun java and ant
installed. Make sure these work by running java and ant manually.

2) Modify your environment so that shell variable $DITA_HOME points to
whereever OTK is installed, typically /usr/local/lib/dita

3) Symlink build/dita2xhtml_custom.xsl into $DITA_HOME/xslt - this is
because the OTK seems to be unable to handle relative paths and you
have to physically place override XSL into the toolkit's location.

4) Run build.sh. The output will be rendered into html_out/

5) If you have XMLMind and want to use it for editing DITA, you have
to install an add-on through its help menu

==========================================================

Contents of this package:

* build/ - contains the ant build script and the custom XSL
* bluesky/ - contains the OSWD Blue Sky template, and a copy modified
  for integration into stage 3
* resources/ - not currently in use
* shjs/ - SHJS syntax highlighter
* sinoircash/ - contains the OSWD sinoircash template distro, and a
  copy modified for Agavi tutorial
* stages/ - contains the sample application source code for every
  stage of the tutorial.
* topics/ - contains the DITA topic contents for the tutorial
* tutorial.ditamap - the master map for the tutorial
* build.sh - *nix build script that sets up the environment and invokes ant.

===========================================================

Organization of the tutorial:

The tutorial is broken into stages. Each chapter of the tutorial
covers the evolution of the demo application into the corresponding
stage. If you add a new chapter, make sure to add it to the map file.

Every chapter should cover all the changes to the application in this
stage, however briefly.
