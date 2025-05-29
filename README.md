# Proxy PHP sécurisé pour StormGlass.io

Ce dépôt contient un petit proxy PHP à héberger sur Render.com afin de sécuriser votre clé API StormGlass.

## Déploiement sur Render

1. Créez un compte sur https://render.com
2. Déployez ce dépôt via "New Web Service"
3. Ajoutez une variable d'environnement :
   - `STORMGLASS_API_KEY` = votre clé API
4. L'URL de l'endpoint sera :  
   `https://votre-app.onrender.com/proxy.php?lat=48.85&lng=2.35`

## Exemple d'utilisation (client JS)

```js
fetch('https://votre-app.onrender.com/proxy.php?lat=48.85&lng=2.35')
  .then(res => res.json())
  .then(data => {
    const temp = data.hours[0].waterTemperature.noaa;
    console.log('Température de l'eau :', temp, '°C');
  });
```