# Mobile dev

## Основы

### Links

- [Ссылка на визуализатор XML](https://labs.udacity.com/android-visualizer/#/android/text-size)
- [Material Design](https://material.io/)
- [Vocabulary Glossary](https://developers.google.com/android/for-all/vocab-words/)
- [Шпаргалка по популярным View-элементам](https://drive.google.com/file/d/0B5XIkMkayHgRMVljUVIyZzNmQUU/view)
- [Пример документации](https://developer.android.com/reference/android/widget/TextView)

### Notes

- Размеры блоков указыаем в ```dp```
- Размеры текста указыаем в ```sp``` [The type system](https://material.io/design/typography/the-type-system.html#type-scale)
- Размер по содержимому ```wrap_content```; По размеру родителя ```match_parent``` [visualizer](https://labs.udacity.com/android-visualizer/#/android/match-parent)
- ```ViewGroups```, ```Root View```, ```LinearView```, ```RelativeView```
- [Linear Layout](https://developer.android.com/guide/topics/ui/layout/linear.html)

### Example codes

[Color](https://labs.udacity.com/android-visualizer/#/android/text-color)
```xml
<TextView
    android:text="I got you a free hug. Surprise!"
    android:background="@android:color/darker_gray"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content"
    android:textSize="45sp" />
```

[Img](https://labs.udacity.com/android-visualizer/#/android/simple-imageview)
```xml
<ImageView
    android:src="@drawable/cake"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content"
    android:scaleType="center"/>
```

[LinearView](https://labs.udacity.com/android-visualizer/#/android/linear-layout)
```xml
<LinearLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    android:orientation="vertical"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content">

    <TextView
        android:text="Guest List"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:textSize="24sp"  />

    <TextView
        android:text="Kunal"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:textSize="24sp"  />

</LinearLayout>
```