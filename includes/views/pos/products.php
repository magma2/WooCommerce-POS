<?php
/**
 * Template for the product list
 */
?>

<script type="text/template" id="tmpl-products-filter">
	<div class="input-group">
		<div class="input-group-btn dropdown mode">
			<a href="#" data-toggle="dropdown"><i class="icon icon-search"></i></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#" data-action="search"><i class="icon icon-search"></i> <?php /* translators: woocommerce */ _e( 'Search Products', 'woocommerce' ); ?></a></li>
				<li><a href="#" data-action="barcode"><i class="icon icon-barcode"></i> <?php _e( 'Scan Barcode', 'woocommerce-pos' ); ?></a></li>
			</ul>
		</div>
		<input type="search" tabindex="1"  autofocus="autofocus" class="form-control">
		<a class="clear" href="#"><i class="icon icon-times-circle icon-lg"></i></a>
		<span class="input-group-btn"><a href="#" data-action="sync"><i class="icon icon-refresh"></i></a></span>
	</div>
</script>

<script type="text/x-handlebars-template" id="tmpl-product">
	<div class="img"><img src="{{featured_src}}" title="#{{id}}"></div>
	<div class="title">
		<strong>{{title}}</strong>
    {{#with product_attributes}}
    <i class="icon icon-info-circle" data-toggle="tooltip" title="
    <dl>
      {{#each this}}
      <dt>{{name}}:</dt>
      <dd>{{#list options ', '}}{{this}}{{/list}}</dd>
      {{/each}}
    </dl>
    "></i>
    {{/with}}
    {{#with product_variations}}
    <dl class="variations">
      {{#each this}}
      <dt>{{name}}:</dt>
      <dd>{{#list options ', '}}{{this}}{{/list}}</dd>
      {{/each}}
    </dl>
    {{/with}}
		{{#if managing_stock}}
		<small><?php /* translators: woocommerce */ printf( __( '%s in stock', 'woocommerce' ), '{{stock_quantity}}' ); ?></small>
		{{/if}}
	</div>
	<div class="price">
    {{#if on_sale}}
      <del>{{#list regular_price ' - '}}{{{money this}}}{{/list}}</del>
      <ins>{{#list sale_price ' - '}}{{{money this}}}{{/list}}</ins>
    {{else}}
      {{#list price ' - '}}{{{money this}}}{{/list}}
    {{/if}}
	</div>
	{{#is type 'variable'}}
	<div class="action"><a data-action="variations" class="btn btn-success btn-circle" href="#"><i class="icon icon-chevron-right icon-lg"></i></a></div>
	{{else}}
	<div class="action"><a data-action="add" class="btn btn-success btn-circle" href="#"><i class="icon icon-plus icon-lg"></i></a></div>
	{{/is}}
</script>

<script type="text/template" id="tmpl-products-empty">
	<div class="empty"><?php /* translators: woocommerce */ _e( 'No Products found', 'woocommerce' ); ?></div>
</script>