#!/usr/bin/env python
import os, time
folder = '/var/www/html/uploads/'
while True:
    for files in os.listdir(folder):
        file_path = os.path.join(folder, files)
        if os.path.isfile(file_path):
            os.unlink(file_path)
    time.sleep(1800)  # 30 minutes
