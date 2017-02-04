<div class="row $CSSClasses">
	<% if $Image %>
		<div class="col-md-4">
			<p><img src="$Image.URL" alt="$Title.XML" class="img-responsive" ></p>
		</div>
		<div class="col-md-8 typography">
	<% else %>
		<div class="col-md-12 typography">
	<% end_if %>
			<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
			<% if $SubTitle %><div class='block_title'><h4>$SubTitle</h4></div><% end_if %>
			<% if $Content %><div class='block_content'>$Content</div><% end_if %>
			<% if $BlockLink %><p>$BlockLink</p><% end_if %>
		</div>
</div>
