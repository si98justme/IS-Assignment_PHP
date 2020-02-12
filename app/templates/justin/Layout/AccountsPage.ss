<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		
		<div class="content accountsView">

			<% if Accounts %>
				<ul>
					<% loop $Accounts %>
						<li id="$ID">
							<span class="accountTitle">
								<a class="" href="{$BaseHref}my-accounts/show/$ID" title="View Transactions for this account">$Title</a>
							</span>
							<span class="accountActions">
								<span class="accountBalance">Account Balance = <span class="accTotal">R $Balance</span> <% if $Balance = 0 %><a href="{$BaseHref}my-accounts/delete?account=$ID" class="accRemove">Remove</a><% end_if %></span>
							</span>
						</li>
						<hr>
					<% end_loop %>
				</ul>
			<% else %>
				<h3>You have no accounts yet. Please click "Add new account" below.</h3>
			<% end_if %>

		<a href="{$BaseHref}my-accounts/add/" class="btn">Add new account</a>
			
		</div>
	</article>
		$Form
		$CommentsForm
</div>