/**
 * Gutenberg Core Block Modifications
 *
 * @package lealue
 */

wp.domReady(function() {
  // unregister default and register custom seperator style
  wp.blocks.unregisterBlockStyle("core/separator", ["default", "wide", "dots"]);
  wp.blocks.registerBlockStyle("core/separator", {
    name: "lealue",
    label: "Lealue",
    isDefault: true
  });
});
