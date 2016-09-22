<div class="$CSSClasses">
	<% if $CalendarID %>
		<% loop $Calendar.UpcomingEvents.Limit($Limit) %>
			<p><a href="$Link.ATT">$Title</a></p>
		<% end_loop %>
		<p><a href="#">View all $Calendar.Title Events</a></p>
	<% end_if %>
</div>