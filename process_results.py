import mysql.connector
import pandas as pd

# Connect to MySQL database
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="iq_test"
)

cursor = conn.cursor()
cursor.execute("SELECT * FROM results")
rows = cursor.fetchall()

# Process data
data = pd.DataFrame(rows, columns=['name', 'mobile', 'age', 'correct_answers', 'time_taken'])
data['iq_category'] = pd.cut(data['correct_answers'], bins=[0, 10, 20, 30], labels=['Low IQ', 'Normal IQ', 'High IQ'])

# Save to CSV
data.to_csv('results.csv', index=False)

cursor.close()
conn.close()
