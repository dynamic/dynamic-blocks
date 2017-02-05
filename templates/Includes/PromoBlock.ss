<div class="$CSSClasses">
	<% if $PromoList %>
		<div class="row">
			<% loop $PromoList %>
                <div class="col-md-4">
					<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
					<% if $Image %><img src="$Image.URL" class="img-responsive" alt="$Title.ATT"><% end_if %>
					<% if $Content %><div class='block_content'>$Content</div><% end_if %>
					<% if $BlockLink %><p>$BlockLink</p><% end_if %>
                </div>
			<% end_loop %>
		</div>
	<% end_if %>
</div>
