import tkinter,time,os.path
import tkinter.filedialog
import sys
import cv2
from image_resize import img_resize

def select(name):

  root=tkinter.Tk()
  root.withdraw()

  print("Select the destination directory")
  print(" PS:go inside it then select open")

  filename=tkinter.filedialog.askopenfilename()
  print(filename)
  if not filename.endswith((".jpg",".jpeg",".png","cnf")):
    print("-1")
    sys.exit()
  img_name="client_images/frame_"+name+".jpg"
  image=cv2.imread(filename)
  clone=image.copy()
  cv2.imwrite(img_name,clone)
  img_resize(img_name)

if __name__=="__main__":
  select(sys.argv[1])
