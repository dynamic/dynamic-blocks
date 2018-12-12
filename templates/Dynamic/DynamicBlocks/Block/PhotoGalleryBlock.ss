<div class="$CSSClasses clearfix">
	<div class="home-news-events">
		<div class="overlay"></div>
		<div class="news-events-label"><span>Photos</span></div>
			<% if $Images %>
				<% loop $Images.Limit(1) %>
					<% with Image %>
						<img class="lazy scale-with-grid" src="$FocusFill(555,555).URL" alt="<% if Headline %>$Headline<% else %>$Name<% end_if %> Thumbnail">
					<% end_with %>
				<% end_loop %>
			<% else %>
					<img src="https://placem.at/things?w=555&h=484&random=1" class="scale-with-grid">
			<% end_if %>
			<div class="text-overlay">
				<div class="inner">
					<h3 class="NewsHeader">$Title</h4>
					<p>$Content</p>
					<% if $Images %>
						<% with $Images.First %>
							<a href="$Image.URL" class="btn ghost" data-lightbox="$Up.Up.Title" data-title="<h4>$Title</h4> $Content">Explore</a>
						<% end_with %>
					<% end_if %>
				</div>
			</div>
	</div>


	<% if $Images %>
		<div style="display: none;">
		<% loop $Images %>
			<% if $First %><% else %>
      <div class="col-md-4 col-sm-6 col-xs-12 photo-gallery-block-item">
          <a href="$Image.URL" data-lightbox="$Up.Title" data-title="<h4>$Title</h4> $Content">
            <img src="$Image.FocusFill(768,535).URL" alt="$Title" class="scale-with-grid">
          </a>
      </div>
			<% end_if %>
		<% end_loop %>
		</div>
	<% end_if %>
</div>