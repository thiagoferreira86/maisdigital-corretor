const vapidPublicKey = 'BHKYuaRO2AeUsuVR32tIt2rd4GgQjkMr_2qRSklFcS3JnxtqyL8vmQjCEZDIYV0EVuBYAM25yqGfZta5oSzlRtY'; // use a gerada anteriormente
document.addEventListener('DOMContentLoaded', async () => {
  if (!('Notification' in window) || !('serviceWorker' in navigator)) return;

  const reg = await navigator.serviceWorker.getRegistration();
  if (!reg) return;

  const subscription = await reg.pushManager.getSubscription();
  if (subscription) {
    document.getElementById('btnDesativar').style.display = 'inline-block';
    document.getElementById('btnAtivar').style.display = 'none';
  }
});

async function ativarNotificacoes() {
  const permission = await Notification.requestPermission();
  if (permission !== 'granted') {
    alert('Você recusou as notificações.');
    return;
  }

  const registration = await navigator.serviceWorker.register('sw.js');

  const subscription = await registration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: urlBase64ToUint8Array(vapidPublicKey)
  });

  await fetch('/dashboard/actions/subscription.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(subscription)
  });

  alert('Notificações ativadas com sucesso!');
  document.getElementById('btnDesativar').style.display = 'inline-block';
  document.getElementById('btnAtivar').style.display = 'none';
}

async function cancelarNotificacoes() {
  const reg = await navigator.serviceWorker.getRegistration();
  if (!reg) return;

  const subscription = await reg.pushManager.getSubscription();
  if (!subscription) {
    alert('Você não está inscrito para notificações.');
    return;
  }

  const sucesso = await subscription.unsubscribe();

  await fetch('/dashboard/actions/remove-subscription.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(subscription)
  });

  if (sucesso) {
    alert('Notificações desativadas com sucesso.');
    document.getElementById('btnDesativar').style.display = 'none';
    document.getElementById('btnAtivar').style.display = 'inline-block';
  } else {
    alert('Erro ao cancelar notificações.');
  }
}

function urlBase64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
  const raw = atob(base64);
  const outputArray = new Uint8Array(raw.length);
  for (let i = 0; i < raw.length; ++i) {
    outputArray[i] = raw.charCodeAt(i);
  }
  return outputArray;
}