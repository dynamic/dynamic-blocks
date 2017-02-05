<div class="$CSSClasses">
	<% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
	<% if $Content %><div class='block_content'>$Content</div><% end_if %>
	<% if $PanelList %>
    <div class="$AccordionClass panel panel-default">
		<% loop $PanelList %>
        <div class="accord-header panel-heading">
            $Title
		</div>
		<div class="panel-body clearfix">
			<% if $Image %>
			<div class="col-md-4">
				<p><img src="$Image.URL" alt="$Title.XML" class="img-responsive" ></p>
			</div>
			<div class="col-md-8">
			<% else %>
			<div class="col-md-12">
			<% end_if %>
            	<div class="typography">$Content</div>
				<p>$BlockLink</p>
			</div>
		</div>
		<% end_loop %>
    </div>
	<% end_if %>
</div>