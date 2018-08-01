@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../goetas/xsd2php/bin/xsd2php
php "%BIN_TARGET%" %*
