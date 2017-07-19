<div class="$CSSClasses clearfix">
    <% if $Images %>
        <% loop $Images.Limit(1) %>
            <% with Image %>
                <img class="lazy scale-with-grid img-responsive" src="$FocusFill(555,555).URL" alt="<% if Headline %>$Headline<% else %>$Name<% end_if %> Thumbnail">
            <% end_with %>
        <% end_loop %>
    <% end_if %>

    <% if $Title %><div class='block_title'><h3>$Title</h3></div><% end_if %>
    <% if $Content %><div class='block_content'>$Content</div><% end_if %>
    <% if $Images %>
        <% with $Images.First %>
            <a href="$Image.URL" class="btn btn-primary" data-lightbox="$Up.Up.Title" data-title="<h4>$Title</h4> $Content">Explore</a>
        <% end_with %>
    <% end_if %>

    <% if $Images %>
        <div style="display: none;">
            <% loop $Images %>
                <% if $First %><% else %>
                    <a href="$Image.URL" data-lightbox="$Up.Title" data-title="<h4>$Title</h4> $Content">
                        <img src="$Image.URL" alt="$Title" class="scale-with-grid img-responsive">
                    </a>
                <% end_if %>
            <% end_loop %>
        </div>
    <% end_if %>
</div>