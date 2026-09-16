import os
import re

directories = ['resources/views', 'database/seeders', 'routes', 'resources/css']

for directory in directories:
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(('.php', '.blade.php', '.css')):
                filepath = os.path.join(root, file)
                try:
                    with open(filepath, 'r', encoding='utf-8') as f:
                        content = f.read()
                    
                    new_content = content
                    new_content = re.sub(r'Polresta Malang Kota', 'Polres Malang', new_content, flags=re.IGNORECASE)
                    new_content = re.sub(r'Polres Malang Kota', 'Polres Malang', new_content, flags=re.IGNORECASE)
                    
                    if new_content != content:
                        with open(filepath, 'w', encoding='utf-8') as f:
                            f.write(new_content)
                        print(f"Updated {filepath}")
                except Exception as e:
                    print(f"Error processing {filepath}: {e}")
