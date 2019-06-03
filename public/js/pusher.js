  Pusher.logToConsole = true;

    var pusher = new Pusher('33cd2f29d17584d63ba9', {
      cluster: 'eu',
      forceTLS: true
    });
     var addItme;
    var channel = pusher.subscribe('createAction');
    channel.bind('creation-commande', function(data) {
     //   alert(data.id)
        alert(JSON.stringify(data));
    });