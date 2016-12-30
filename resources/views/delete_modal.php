<div class="modal fade" id="modal-delete-notification" tabindex="-1" role="dialog">
  <div class="modal-dialog" v-if="deletingNotification">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Announcement</h4>
      </div>
      <div class="modal-body">Are you sure you want to delete this announcement?</div>
      <!-- Modal Actions -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>
        <button type="button" class="btn btn-danger" @click="deleteNotification" :disabled="deleteForm.busy">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>
