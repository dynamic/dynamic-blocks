<div class="$CSSClasses">
	<% if $EmbeddedObject %>
		<div class="panel row">
			<p>$EmbeddedObject</p>
			<% if $EmbeddedObject.ThumbURL %>
                <div class="col-md-3">
                    <p><img src="$EmbeddedObject.ThumbURL" alt="$EmbeddedObject.Title.XML" class="img-responsive" ></p>
                </div>
            <div class="col-md-9">
			<% else %>
            <div class="col-md-12">
			<% end_if %>
            	<h2>$EmbeddedObject.Title</h2>
            	<p>$EmbeddedObject.Description.LimitCharacters(300)</p>
        	</div>
        </div>
	<% end_if %>
</div>
