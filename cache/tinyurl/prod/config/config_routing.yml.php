<?php
// auto-generated by sfRoutingConfigHandler
// date: 2009/07/17 00:35:29
return array(
'homepage' => new sfRoute('/', array (
  'module' => 'tinyurl',
  'action' => 'index',
), array (
), array (
)),
'new' => new sfRoute('/new', array (
  'module' => 'tinyurl',
  'action' => 'new',
), array (
), array (
)),
'create' => new sfRoute('/create', array (
  'module' => 'tinyurl',
  'action' => 'create',
), array (
), array (
)),
'tinyurl_index' => new sfRoute('/admin', array (
  'module' => 'admin',
  'action' => 'index',
), array (
), array (
)),
'tinyurl_' => new sfRoute('/admin/:action', array (
  'module' => 'admin',
), array (
), array (
)),
'redirect' => new sfRoute('/*', array (
  'module' => 'tinyurl',
  'action' => 'redirect',
), array (
), array (
)),
);
