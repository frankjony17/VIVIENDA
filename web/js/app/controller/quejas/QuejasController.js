
Ext.define('VIV.controller.quejas.QuejasController', {
    extend: 'Ext.app.Controller',

    control: {
        /* Grid */
        'grid-quejas': {
            afterrender: "afterRenderGrid",
            celldblclick: "dblclick",
            resize: "resize"
        },
        '#menu-quejas': {
            click: ""
        }
    },
    resize: function (grid){
        var centerpanel = Ext.getCmp('center-panel-id');
        grid.setHeight(centerpanel.getHeight());
    },
    afterRenderGrid: function (grid) {
        this.grid = grid;
        this.store = grid.getStore();
    },

    /* MESSAGE */
    message: function (title, message, icon) {
        Ext.Msg.show({ title: title, message: message, buttons:Ext.MessageBox.OK, icon: icon });
    },
});