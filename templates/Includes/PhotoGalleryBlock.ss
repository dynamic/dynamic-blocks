<div class="$CSSClasses clearfix row">
	<% if $Images %>
		<% loop $Images %>
            <div class="col-md-4 col-sm-6 col-xs-12 photo-gallery-block-item">
                <a href="$Image.URL" data-lightbox="$Up.Title" data-title="<h4>$Title</h4> $Content">
                    <img src="$Image.FocusFill(232,299).URL" alt="$Title" class="scale-with-grid">
                </a>
            </div>
			<% if MultipleOf(3,1) %><div class="clearfix hidden-sm hidden-xs"></div><% end_if %>
			<% if MultipleOf(2,1) %><div class="clearfix hidden-lg hidden-md hidden-xs"></div><% end_if %>
		<% end_loop %>
	<% end_if %>
</div>