<div class="panel panel-default">
  <div class="panel-heading">Create Notification</div>
  <div class="panel-body">
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Notifications you create here will be sent to the "Notifications" section of
      the notifications modal window for that specific user.
    </div>
    <form class="form-horizontal" role="form">
      <!-- User -->
      <div class="form-group">
        <label class="col-md-4 control-label">User</label>
        <div class="col-md-6">
          <v-select multiple
            :options="users"
            label="name"
            v-model="newNotification.user"
            name="user"
            placeholder="Select A User"></v-select>
        </div>
      </div>

      <!-- Notification -->
      <div class="form-group">
        <label class="col-md-4 control-label">Notification</label>
        <div class="col-md-6">
          <textarea class="form-control" name="notification"  v-model="newNotification.body" rows="7" style="font-family: monospace;"></textarea>
        </div>
      </div>

      <!-- Action Text -->
      <div class="form-group">
        <label class="col-md-4 control-label">Action Button Text</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="action_text"  v-model="newNotification.action_text">
        </div>
      </div>

      <!-- Action URL -->
      <div class="form-group">
        <label class="col-md-4 control-label">Action Button URL</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="action_url"  v-model="newNotification.action_url">
        </div>
      </div>

      <!-- Create Button -->
      <div class="form-group">
        <div class="col-md-offset-4 col-md-6">
          <button type="submit" class="btn btn-primary" @click.prevent="createNotification">
            Create
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
