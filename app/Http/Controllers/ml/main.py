# from flask import Flask, render_template, request

# print('hallo')
import os
import sys
import pickle
import sklearn
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.model_selection import train_test_split
from sklearn.naive_bayes import MultinomialNB
from sklearn.metrics import accuracy_score, classification_report, confusion_matrix
from flask import Flask

app = Flask(__name__)

@app.route('/')
def hello_world():
    return 'Hello, World!'

# # filename = 'Apps_Classification.pkl'

base_path = os.path.dirname(os.path.abspath(__file__))

model_path = os.path.join(base_path, 'Decision_tree_model.pkl')
vectorizer_path = os.path.join(base_path, 'tfidf_vectorizer_baru.pkl')

classifier = pickle.load(open(model_path, 'rb'))
cv = pickle.load(open(vectorizer_path, 'rb'))

# print(base_path)

# classifier = pickle.load(open(
#     'C:/Users/HP/Documents/PROJECTS/lomba/biro-hajj-app/app/Http/Controllers/ml/Decision_tree_model.pkl', 'rb'))
# cv = pickle.load(open(
#     'C:/Users/HP/Documents/PROJECTS/lomba/biro-hajj-app/app/Http/Controllers/ml/tfidf_vectorizer_baru.pkl', 'rb'))
# # app = Flask(name)

# print(cv)

url = sys.argv[1] if len(sys.argv) > 1 else None
price = sys.argv[2] if len(sys.argv) > 2 else None
rating = sys.argv[3] if len(sys.argv) > 3 else None
duration = sys.argv[4] if len(sys.argv) > 4 else None
airline = sys.argv[5] if len(sys.argv) > 5 else None
category = sys.argv[6] if len(sys.argv) > 6 else None

# Check if all parameters are provided
if all(param is not None for param in [url, price, rating, duration, airline, category]):
    # print(f"URL: {url}, Price: {price}, Rating: {rating}, Duration: {duration}")

    # Transform the input data using the loaded vectorizer
    data = [f"{url} {price} {rating} {duration} {airline} {category}"]
    # print(data)
    vect = cv.transform(data).toarray()

    # Make predictions using the loaded classifier
    # print("Number of features in input data:", vect.shape[1])
    my_prediction = classifier.predict(vect)

    # Print the prediction result
    print(my_prediction[0].strip(), end='')
else:
    print("Please provide all four parameters: URL, Price, Rating, Duration.")
# url = sys.argv[1]
# print(url)
# data = [url]
# vect = cv.transform(data).toarray()
# my_prediction = classifier.predict(vect)
# print(my_prediction)


# if __name__ == '__main__':
#     app.run(debug=True)
