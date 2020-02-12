<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		
		<div class="content accountsView">
			<% with $Account %>
				<% if $Transactions %>
				<ul>
					<% loop $Transactions %>
						<li id="$ID">
							$Title
							<span class="right">
								<span class="transactionAmount">Amount = R $Amount</span>
							</span>
						</li>
						<hr>
					<% end_loop %>
				</ul>
				<% else %>
					<h3>There are no transactions on this account yet, click the "Add Transaction" button below.</h3>
				<% end_if %>

				<a href="{$BaseHref}my-accounts/transactionadd?accountid=$ID" class="btn">Add transaction</a>
				<a href="{$BaseHref}my-accounts/" class="btn right">Back to Accounts</a>
			<% end_with %>
			
		</div>
	</article>
</div>