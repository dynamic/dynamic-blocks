<div class="$CSSClasses">
	<% if $BlogID %>
		<% loop $Blog.BlogPosts.Limit($Limit) %>
            <div class="post-summary clearfix">
                <% if $FeaturedImage %>
                    <div class="col-md-3">
                        <p><img src="$FeaturedImage.Fill(300,300).URL" alt="$Title.XML" class="img-responsive" ></p>
                    </div>
                <div class="col-md-9">
				<% else %>
                <div class="col-md-12">
				<% end_if %>
                <h4>
                    <a href="$Link" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
						<% if $MenuTitle %>$MenuTitle
						<% else %>$Title<% end_if %>
                    </a>
                </h4>
                <div class="typography">
					<% if $Summary %>
						$Summary
					<% else %>
                        <p>$Excerpt</p>
					<% end_if %>
				</div>
                <a href="$Link">
					<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>
                </a>
				<% include EntryMeta %>
            </div>
		</div>
		<% end_loop %>
		<p class="clearfix"><a href="$Blog.Link">View all $Blog.Title Articles</a></p>
	<% end_if %>
</div>