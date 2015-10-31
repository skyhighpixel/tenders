<% tenders.map(function(tender) { %>
<form class="edit-tender">
	<div class="panel <% tender.live == 1 ? print ('panel-success') : print ('panel-danger'); %> tender-panel" data-tender-id="<%- tender.id %>" data-edit-mode="0">
		<div class="panel-heading" role="tab" id="heading<%- tender.id %>">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<%- tender.id %>" aria-expanded="true" aria-controls="collapse<%- tender.id %>">
					<span class="title-text"><%- tender.title %></span>
				</a>
			</h4>
		</div>
		<div id="collapse<%- tender.id %>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<%- tender.id %>">
			<div class="panel-body">
				<p><span class="btn btn-info edit-btn">Edit <i class="fa fa-pencil"></i></span></p>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th class="col-xs-2">ID</th>
							<td class="col-xs-10"><%- tender.id %></td>
						</tr>
						<tr>
							<th class="col-xs-2">ATM ID</th>
							<td class="col-xs-10"><%- tender.atm_id %></td>
						</tr>
						<tr>
							<th class="col-xs-2">Agency</th>
							<td class="col-xs-10"><p class="agency-text"><%- tender.agency %></p>
								<input type="text" class="form-control" name="agency" value="<%- tender.agency %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Title</th>
							<td class="col-xs-10"><p class="title-text"><%- tender.title %></p>
								<input type="text" class="form-control" name="title" value="<%- tender.title %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Description</th>
							<td class="col-xs-10"><p class="description-text"><%- tender.description %></p>
								<textarea class="form-control" name="description"><%- tender.description %></textarea>
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Close Date</th>
							<td class="col-xs-10"><p class="close_date-text"><%- tender.close_date %></p>
								<input type="text" class="form-control" name="close_date" value="<%- tender.close_date %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Publish Date</th>
							<td class="col-xs-10"><p class="publish_date-text"><%- tender.publish_date %></p>
								<input type="text" class="form-control" name="publish_date" value="<%- tender.publish_date %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Contact Phone</th>
							<td class="col-xs-10"><p class="contact_phone-text"><%- tender.contact_phone %></p>
								<input type="text" class="form-control" name="contact_phone" value="<%- tender.contact_phone %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Contact Email</th>
							<td class="col-xs-10"><p class="contact_email-text"><%- tender.contact_email %></p>
								<input type="text" class="form-control" name="contact_email" value="<%- tender.contact_email %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Category</th>
							<td class="col-xs-10"><p class="category-text"><%- tender.category %></p>
								<input type="text" class="form-control" name="category" value="<%- tender.category %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">URL</th>
							<td class="col-xs-10"><p class="url-text"><%- tender.url %></p>
								<input type="text" class="form-control" name="url" value="<%- tender.url %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Base URL</th>
							<td class="col-xs-10"><p class="base_site-text"><%- tender.base_site %></p>
								<input type="text" class="form-control" name="base_site" value="<%- tender.base_site %>"/>	
							</td>
						</tr>
						<tr>
							<th class="col-xs-2">Push live ?</th>
							<td class="col-xs-10">
								<input type="radio" name="live" value="1" <% tender.live == 1 ? print ('checked') : ''; %>>Yes
								<input type="radio" name="live" value="0" <% tender.live == 0 ? print ('checked') : ''; %>>No
							</td>
						</tr>
					</table>
					<div>
						<button type="submit" class="btn btn-success">Save&nbsp;<i class="fa fa-save"></i></button>
						<span class="btn btn-default cancel-btn">Cancel</span>
					</div>
					<div class="edit-message"></div>
				</div>
			</div>

		</div>
	</div>
	
</form>

<% }) %>
