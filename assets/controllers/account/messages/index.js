import angular from 'angular';
import Module from 'app.module';
import template from './template.html';
import notify from 'notify';
import MessageServiceName from 'services/message';
import MessageDialog from 'message';

const CONTROLLER_NAME = 'AccountMessagesController';
const STATE_NAME = 'account-messages';

angular.module(Module)
    .config(['$stateProvider',
        function config($stateProvider) {
            $stateProvider.state( {
                name: STATE_NAME,
                url: '/account/messages?folder&user_id&page',
                controller: CONTROLLER_NAME,
                controllerAs: 'ctrl',
                template: template
            });
        }
    ])
    .controller(CONTROLLER_NAME, [
        '$scope', '$http', '$state', MessageServiceName, 
        function($scope, $http, $state, MessageService) {
            
            var ctrl = this;
            
            ctrl.folder = $state.params.folder || 'inbox';
            var pageId = null;
            var userId = null;
            switch (ctrl.folder) {
                case 'inbox':
                    pageId = 128;
                    break;
                case 'sent':
                    pageId = 80;
                    break;
                case 'system':
                    pageId = 81;
                    break;
                case 'dialog':
                    pageId = 49;
                    userId = $state.params.user_id;
                    break;
            }
            
            $scope.pageEnv({
                layout: {
                    blankPage: false,
                    needRight: false
                },
                pageId: pageId
            });
            
            ctrl.items = [];
            ctrl.paginator = null;
            
            function load() {
                $http({
                    method: 'GET',
                    url: '/api/message',
                    params: {
                        folder: ctrl.folder,
                        page: $state.params.page,
                        fields: 'author.avatar,author.gravatar',
                        user_id: userId
                    }
                }).then(function(response) {
                    ctrl.items = response.data.items;
                    ctrl.paginator = response.data.paginator;
                }, function(response) {
                    notify.response(response);
                });
            }
            
            ctrl.deleteMessage = function(id) {
                MessageService.deleteMessage(id).then(function(response) {
                    for (var i=0; i<ctrl.items.length; i++) {
                        if (ctrl.items[i].id == id) {
                            ctrl.items.splice(i, 1);
                            break;
                        }
                    }
                }, function(response) {
                    notify.response(response);
                });
            };

            ctrl.clearFolder = function(folder) {
                MessageService.clearFolder(folder).then(function() {
                    if (ctrl.folder == folder) {
                        ctrl.items = [];
                        ctrl.paginator = null;
                    }
                }, function(response) {
                    notify.response(response);
                });
            };
            
            ctrl.openMessageForm = function(userId) {
                MessageDialog.MessageService = MessageService;
                MessageDialog.showDialog(userId, null, function() {
                    switch (ctrl.folder) {
                        case 'sent':
                        case 'dialog':
                            load();
                            break;
                    }
                });
            };
            
            load();
        }
    ]);

export default CONTROLLER_NAME;