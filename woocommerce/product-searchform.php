<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>" class="searchform pl-searcher" onsubmit="this.submit();return false;">
	<fieldset>
		<span class="btn-search"><i class="icon icon-search"></i></span>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search" class="searchfield" />
		<input type="hidden" name="post_type" value="product" />
	</fieldset>
</form>


