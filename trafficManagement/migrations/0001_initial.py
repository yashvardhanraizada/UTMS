# Generated by Django 2.2.7 on 2019-11-08 09:53

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Data',
            fields=[
                ('user_name', models.CharField(max_length=20, primary_key=True, serialize=False)),
                ('name', models.CharField(max_length=20)),
                ('mobile_number', models.CharField(max_length=10)),
                ('residence', models.CharField(max_length=200)),
                ('aadhar', models.CharField(max_length=12)),
                ('password', models.CharField(max_length=12)),
            ],
        ),
    ]
