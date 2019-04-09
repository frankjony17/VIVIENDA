
Ext.define('VIV.view.admin.users.UsersMenu', {
    extend: 'Ext.menu.Menu',
    
    width: 200,
    closeAction : 'destroy',
    
    initComponent: function () {
        var me = this;
        me.items = [{
            text: 'Editar usuario',
            iconCls: 'tree-usuarios'

        },'-',{
            text: 'Cambiar contraseña',
            iconCls: 'menu-password-item'
        },'-',{
            text: 'Añadir o quitar Roles',
            iconCls: 'tree-roles'
        }];
        me.callParent(arguments);
    }
});