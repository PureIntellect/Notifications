<div class="panel panel-default">
  <div class="panel-heading">Create Notification</div>
  <div class="panel-body">
    <div class="alert alert-info alert-dismissible">
      Notifications you create here will be sent to the "Notifications" section of
      the notifications modal window for that specific user.
    </div>
    <form class="form-horizontal" role="form">
      <!-- User -->
      <div class="form-group">
        <label class="col-md-4 control-label">User</label>
        <div class="col-md-6">
          <select class="form-control" name="user_id" v-model="newNotification.user_id">
            <option value="">Choose User...</option>
            <option v-for="usr in users" :value="usr.id">@{{ usr.name }}</option>
          </select>
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
