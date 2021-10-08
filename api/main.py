from flask import Flask
import smtplib
app = Flask(__name__)
@app.route("/",methods=["POST"])
#@crossorigin("*")
def sendMail():
        try:
                smtp0obj = smtplib.SMTP('smtp.gmail.com',587)
                smtp0obj.ehlo()
                smtp0obj.starttls()
                smtp0obj.login('toalarma@gmail.com','toalarma2017')
                smtp0obj.sendmail('toalarma@gmail.com','jordi.faraudo@gmail.com',text)
                smtp0obj.quit()
                return "Email success sended"
        except:
                return "Error"
if __name__ == '__main__':
	app.run(host='0.0.0.0', port=8080)

