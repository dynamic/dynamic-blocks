<div class="$CSSClasses">
	<% if $Articles %>
		<% loop $Articles %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
		<p><a href="#">View all $CurrentPage.Title Articles</a></p>
	<% end_if %>

</div>
