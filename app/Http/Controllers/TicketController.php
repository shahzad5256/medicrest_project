<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\Ticket;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;



class TicketController extends Controller
{
     public function AddTicket(Request $req)
    {
        $validator=Validator::make($req->all(),[
            'subject'=>'required',
            'message'=>'required',
            
         ]);

        if($validator->fails()){
            return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
        }

        $user_id=Auth::user()->id;
      

        $addticket=new SupportTicket();
        $addticket->user_id=$user_id;
        $addticket->subject=$req->subject;
        $addticket->message=$req->message;
        $addticket->attachment=$req->attachment;
        $addticket->status='open';
        $addticket->save();
        
       
        if($addticket)
        {
            return response()->json(['status'=>'success','msg'=>'Support ticket added successfully']);
        }else{
            return response()->json(['status'=>'fail','msg'=>'Support ticket not added']);
        }
    }

    public function TicketList()
    {
        $ticketlist=SupportTicket::where('user_id',Auth::user()->id)->get();
        if(isset($ticketlist) && sizeof($ticketlist)>0)
        {
            $html="";
            foreach($ticketlist as $ticket)
            {
                if($ticket->status == "open"){
                    $status="open";
                    $bg='badge-success';
                }else{
                    $status="close";
                    $bg='badge-danger';
                }
                $html.='
                <tr>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="fw-bolder">#'.$ticket->id.'</div>
                                </div>

                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <span>'.$ticket->user->first_name.' '.$ticket->user->last_name.'</span>
                                    
                                </div>
                                <span><small class="text-muted">'.$ticket->user->email.'<small></span>
                            </td>
                           
                            
                            <td>
                                <p class="mt-1">'.$ticket->subject.'</p>
                            </td>
                            
                           
                             <td class="text-nowrap">
                                <div>
                                    <span class="badge '.$bg.'">'.$status.'</span>

                                </div>
                            </td>

                            <td>
                            '.($ticket->status == "open" ? '
                            
                                    <a href="/ticket/details/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View Ticket"><i class="si si-eye tx-12"></i></a>
                                    <a href="/ticket/edit/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Ticket"><i class="si si-pencil tx-12"></i></a>
                                   
                            
                            ':'
                            
                                    <a href="/ticket/details/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-info disabled"  data-bs-toggle="tooltip" data-bs-placement="top" title="View Ticket"><i class="si si-eye tx-12"></i></a>
                                    <a href="/ticket/edit/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-warning disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Ticket"><i class="si si-pencil tx-12"></i></a>
                                   
                            
                            ').'
                                
                            </td>
                        </tr>
                ';
            }
            return response()->json(['status'=>'success','rows'=>$html]);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }




    public function TicketEdit($id)
    {
        $editticket=SupportTicket::find($id);
        if($editticket){
            $file = json_decode($editticket->attachment);
            return view('agent/ticket/ticketedit',['tickets'=>$editticket,'files'=>$file]);
        }
        else{
            return view('agent/notfound');
            }
    }

    
    // admin
      public function EditTickets($id)
    {
        $editticket=SupportTicket::find($id);
        if($editticket){
            $file = json_decode($editticket->attachment);
            return view('admin/ticket/editticket',['tickets'=>$editticket,'files'=>$file]);
        }
        else{
      return view('notfound');
}
    }

    public function UpdateTicket(Request $req)
    {
        $validator=Validator::make($req->all(),[
            'subject'=>'required',
            'message'=>'required',
            

            
         ]);

        if($validator->fails()){
            return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
        }
        $updateticket=SupportTicket::find($req->id);
        if($updateticket){
        if($req->attachment != ''){
        $updateticket->subject=$req->subject;
        $updateticket->message=$req->message;
        $updateticket->status=$req->status;
        $updateticket->attachment=$req->attachment;
        $updateticket->save();
        }else{
        $updateticket->subject=$req->subject;
        $updateticket->message=$req->message;
        $updateticket->status=$req->status;
        $updateticket->save();

        }
        return response()->json(['status'=>'success','msg'=>'Ticket updated successfully']);
    }else{
        return response()->json(['status'=>'fail','msg'=>'Ticket not updated']);

    }
  }
  public function DeleteTicket($id)
  {
      $deleteticket=SupportTicket::find($id)->delete();
      if($deleteticket){
          return response()->json(['status'=>'success']);
      }else{
          return response()->json(['status'=>'fail']);
      }
  }
  public function TicketView()
  {
      $tickets=SupportTicket::all();
      if(isset($tickets) && sizeof($tickets)>0){
          $html="";
          $btnview="";
          $btnedit="";
          $btndelete="";
          foreach($tickets as $ticket){
                if($ticket->status=="open"){
                    $status='open';
                    $bg='badge-success';
                }else{
                    $status='close';
                    $bg='badge-danger';
                }
   
     

              $html.='
                <tr>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="fw-bolder">#'.$ticket->id.'</div>
                                </div>

                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <span>'.$ticket->user->first_name.' '.$ticket->user->last_name.'</span>
                                    
                                </div>
                                <span><small class="text-muted">'.$ticket->user->email.'<small></span>
                            </td>
                            <td>
                                <p class="mt-1">'.$ticket->subject.'</p>
                            </td>
                            <td class="text-nowrap">
                                <div>
                                    <span class="badge '.$bg.'">'.$status.'</span>

                                </div>
                            </td>

                            <td>
                                <a href="/tickets/edit/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-warning"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Ticket"><i class="si si-pencil tx-12"></i></a>
                                <a href="javascript:;" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-danger btnDeleteTickets"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Ticket"><i class="si si-trash tx-12"></i></a>
                                <a href="/ticket/detail/'.$ticket->id.'" id="'.$ticket->id.'" type="button" class="btn btn-sm button-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View Ticket"><i class="si si-eye tx-12"></i></a>
                            </td>

                           
                        </tr>
              ';
          }
      return response()->json(['status'=>'success','rows'=>$html]);
      }else{
      return response()->json(['status'=>'fail']);
      }
  }
  public function TicketDetail($id)
  {
      $ticket=SupportTicket::find($id);
      if($ticket){
      return view('admin/ticket/ticketdetail',['tickets'=>$ticket]);
  }else{
      return view('notfound');
  }
}
public function TicketsDetails($id)
{
      $ticket=SupportTicket::find($id);
      if($ticket){
      return view('agent/ticket/ticketdetail',['tickets'=>$ticket]);
  }else{
      return view('agent/notfound');
}
}
public function uploadFiles(Request $request){
    $validator = Validator::make($request->all(),[
        'file' => 'required'   
    ]);
    $file=$request->file;
    $fileArr = array();
    if ($file){
        $path = public_path().'/uploads/imagess/';
        $fileNam=$file->getClientOriginalName();
        $ext=$file->getClientOriginalExtension();
        $size=$file->getSize();
        $imgHash = time().md5(rand(0,10));
        $filename =$imgHash.".".$ext;
        $move=$file->move($path, $filename);
        $fileArr["file"]["filename"] = $filename;
        $fileArr["file"]["name"] = $fileNam;
        $fileArr["file"]["ext"] = $ext;
        $fileArr["file"]["size"] = $size;
        $fileArr["file"]["date"]=date('d-m-y');
        //$files=json_encode($fileArr);
        return response()->json(['status'=>'success','file'=>$fileArr]);
    }
    else{
        return response()->json(['status'=>'fail','msg'=>'Please select a file']);
    }
}
public function DeleteFiles(Request $request){
    $file=$request->file;
    if ($file){
        $path =  '/uploads/imagess/';
        //code for remove old file
        if ($file != '') {
            $file_old = $path . $file;
            if (file_exists($file_old)){
                unlink($file_old);
            }
        }
        return response()->json(['status'=>'success','msg'=>'Image deleted successfully']);
    }else{
        return response()->json(['status'=>'fail','msg'=>'Failed to delete image']);
    }
}
public function AddAdminTicket(Request $req)
{
    $validator=Validator::make($req->all(),[
        'subject'=>'required',
        'message'=>'required',
        


        
        
     ]);

    if($validator->fails()){
        return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
    }

  

    $addticket=new SupportTicket();
    $addticket->user_id=$req->user_id;
    $addticket->subject=$req->subject;
    $addticket->message=$req->message;
    $addticket->attachment=$req->attachment;
    $addticket->status='open';
    $addticket->save();
    
   
    if($addticket)
    {
        return response()->json(['status'=>'success','msg'=>'Support ticket added successfully']);
    }else{
        return response()->json(['status'=>'fail','msg'=>'Support ticket not added']);
    }
}
}