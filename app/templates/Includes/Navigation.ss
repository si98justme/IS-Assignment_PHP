<nav class="primary">
	<span class="nav-open-button">²</span>
	<ul>
		<% loop $Menu(1) %>
			<% if $CurrentMember && $MenuTitle == "Login" %>
				<li class=""><a href="$BaseHref/Security/logout" title="Logout">Logout</a></li>
			<% else %>
				<li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
			<% end_if %>
		<% end_loop %>
	</ul>
</nav>
