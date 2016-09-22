<div class="$CSSClasses">
	<% if $CurrentPage.Children %>
		<% loop $CurrentPage.Children %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
	<% end_if %>
</div>
