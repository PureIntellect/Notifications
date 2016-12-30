<spark-kiosk-notifications inline-template>
  <div>
    <!-- Create Notification -->
      @include('Notifications::create')

    <!-- Recent Notifications List -->
    <div class="panel panel-default" v-cloak>
      <div class="panel-heading">Recent Notifications</div>
        <div class="panel-body">
          <table class="table table-borderless m-b-none">
            <thead>
              <th>Created By</th>
              <th>Date</th>
              <th>User</th>
              <th></th>
            </thead>
            <tbody>
              <tr v-for="notification in notifications">
                <!-- Photo -->
                <td>
                  <img v-if="notification.creator" :src="notification.creator.photo_url" class="spark-profile-photo">
                  <span v-if="notification.creator">@{{ notification.creator.name }}</span>
                </td>

                <!-- Date -->
                <td>
                  <div class="btn-table-align">@{{ notification.created_at | datetime }}</div>
                </td>
                <td>
                  <img :src="notification.user.photo_url" class="spark-profile-photo">
                </td>

                <!-- Actions -->
                <td>
                  <button class="btn btn-primary" @click="editNotification(notification)">
                    <i class="fa fa-pencil"></i>
                  </button>
                  <button class="btn btn-danger-outline" @click="approveNotificationDelete(notification)">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Update Notification Modal -->
      @include('Notifications::update_modal')

      <!-- Delete Notification Modal -->
      @include('Notifications::delete_modal')
  </div>
</spark-kiosk-notifications>
