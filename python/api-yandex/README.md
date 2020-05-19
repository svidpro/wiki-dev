# Использование [Alpha] Неофициальная Python библиотека для API Yandex Music

- [Alpha Неофициальная Python библиотека для API Yandex Music](https://github.com/MarshalX/yandex-music-api/tree/master)

```python

from yandex_music.client import Client

client = Client.from_credentials('xxx', 'xxx')

#client.users_likes_tracks()[0].track.download('example.mp3')

for i in range(188):
	client.users_likes_tracks()[i].track.download('track{}.mp3'.format(i))

```
