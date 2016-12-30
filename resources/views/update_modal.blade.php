
<div class="modal fade" id="modal-update-notification" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" v-if="updatingNotification">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update Notification</h4>
      </div>
      <div class="modal-body">
        <!-- Update Notification -->
        <form class="form-horizontal" role="form">
          <div class="row">
            <!-- User -->
            <div class="form-group">
              <label class="col-md-4 control-label">User</label>
              <div class="col-md-6">
                <select class="form-control" name="user_id" v-model="updateForm.user_id">
                  <option value="">Choose User...</option>
                  <option v-for="usr in users" :value="usr.id">@{{ usr.name }}</option>
                </select>
              </div>
            </div>

            <!-- Notification -->
            <div class="form-group">
              <label class="col-md-4 control-label">Notification</label>
              <div class="col-md-6">
                <textarea class="form-control" name="notification"  v-model="updateForm.body" rows="7" style="font-family: monospace;"></textarea>
              </div>
            </div>

            <!-- Action Text -->
            <div class="form-group">
              <label class="col-md-4 control-label">Action Button Text</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="action_text"  v-model="updateForm.action_text">
              </div>
            </div>

            <!-- Action URL -->
            <div class="form-group">
              <label class="col-md-4 control-label">Action Button URL</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="action_url"  v-model="updateForm.action_url">
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal Actions -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="update" :disabled="updateForm.busy">Update</button>
      </div>
    </div>
  </div>
</div>
