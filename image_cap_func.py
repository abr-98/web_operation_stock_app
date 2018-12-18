import cv2, time,sys
from PIL import Image
from image_resize import img_resize
#from datetime import datetime
def capture(name):

  first_frame=None
  status_list=[None,None]
  #times=[]
  #df=pandas.DataFrame(columns=["Start","End"])
  img_counter=0
  video=cv2.VideoCapture(0)

  while True:
    check, frame = video.read()
    status=0
    gray=cv2.cvtColor(frame,cv2.COLOR_BGR2GRAY)
    gray=cv2.GaussianBlur(gray,(21,21),0)

    if first_frame is None:
        first_frame=gray
        continue

    delta_frame=cv2.absdiff(first_frame,gray)
    thresh_frame=cv2.threshold(delta_frame, 30, 255, cv2.THRESH_BINARY)[1]
    thresh_frame=cv2.dilate(thresh_frame, None, iterations=2)


    cv2.imshow("Color Frame-ESC to close SPACE to capture",frame)

    key=cv2.waitKey(1)

    if key%256 == 27:
      #ESC
      print("closing")
      break
    elif  key%256 ==32:
      #SPACE
      img_ctr=str(img_counter)
      img_name="client_images/frame"+name+".jpg".format(img_counter)


      cv2.imwrite(img_name,frame)
      imk=Image.open(img_name)
      imk.load()
      imk.show()
      print("written".format(img_name))
      img_counter+=1


  video.release()
  cv2.destroyAllWindows()
  img_name="client_images/frame_"+name+".jpg".format(img_counter)
  img_resize(img_name)
  print(img_ctr)

if  __name__=="__main__":
    capture(sys.argv[1])
