<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		
			$TransactionAddForm
				<a href="{$BaseHref}my-accounts/show/$AccountID" class="btn right">Back to account</a>
			
		</div>
	</article>
		$Form
		$CommentsForm
</div>