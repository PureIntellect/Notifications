Vue.component('spark-kiosk-notifications', {
    props: [],
    data() {
        var notificationsCreateForm = function() {
          return {
            id: '',
            body: '',
            user_id:'',
            action_text: '',
            action_url: '',
            created_by: '',
          }
        }
        return {
          updatingNotification: null,
          deletingNotification: null,
          'notifications': [],
          'users': [],
          'newNotification': new SparkForm(notificationsCreateForm()),
          'updateForm': new SparkForm(notificationsCreateForm()),
          'deleteForm': new SparkForm({})
        };
    },
    mounted(){
        this.getNotifications();
        this.getUsers();
    },
    methods: {
        /**
         * Get all of the announcements.
         */
        getNotifications: function(){
            this.$http.get('/pi/notifications/notifications')
                .then(response => {
                    this.notifications = response.data;
                });
        },

        /**
         * Get all of the users.
         */
        getUsers: function(){
            this.$http.get('/pi/notifications/get/users')
                .then(response => {
                    this.users = response.data;
                });
        },

        /**
         * Create Notification.
         */
        createNotification: function(){
            this.$http.post('/pi/notifications/notifications', this.newNotification)
                .then(response => {
                    this.newNotification = {};
                    this.getNotifications();
                });
        },
        editNotification(notification)
        {
            this.updatingNotification = notification;

            this.updateForm.body = notification.body;
            this.updateForm.user_id = notification.user_id;
            this.updateForm.action_text = notification.action_text;
            this.updateForm.action_url = notification.action_url;
            this.updateForm.created_by = notification.created_by;

            $('#modal-update-notification').modal('show');
        },
        update() {
          Spark.put('/pi/notifications/notifications' + this.updatingNotification)
            .then(() => {
              this.getNotifications();
              $('#modal-update-notification').modal('hide');
            });
        },

        /**
         * Show the approval dialog for deleting an announcement.
         */
        approveNotificationDelete(notification) {
            this.deletingNotification = notification;
            $('#modal-delete-notification').modal('show');
        },


        /**
         * Delete the specified announcement.
         */
        deleteNotification() {
            Spark.delete('/pi/notifications/notifications/' + this.deletingNotification.id, this.deleteForm)
                .then(response => {
                    this.results = response;
                    this.getNotifications();
                    $('#modal-delete-notification').modal('hide');
                });
        }

    }
});
