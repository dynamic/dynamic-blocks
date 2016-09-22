<div class="$CSSClasses">
	<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
	<% if $Content %><div class='block_content'>$Content</div><% end_if %>
	<% if $Panels %>
		<% loop $Panels %>
			<h4>$Title</h4>
			<p>$Image</p>
			$Content
		<% end_loop %>
	<% end_if %>
</div>
