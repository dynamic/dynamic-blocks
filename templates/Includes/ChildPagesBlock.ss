<div class="$CSSClasses">
	<% if $CurrentPage.Children %>
		<h4>$CurrentPage.MenuTitle</h4>
		<% loop $CurrentPage.Children %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>

	<% else_if $CurrentPage.Parent %>
		<% with $CurrentPage.Parent %>
			<h4><a href="$Link.ATT">$MenuTitle</a></h4>
			<% loop $Children %>
				<% if $ID == $Up.Up.CurrentPage.ID %>
					<p>$MenuTitle</p>
				<% else %>
					<p><a href="$Link.ATT">$MenuTitle</a></p>
				<% end_if %>
			<% end_loop %>
		<% end_with %>
	<% end_if %>
</div>
