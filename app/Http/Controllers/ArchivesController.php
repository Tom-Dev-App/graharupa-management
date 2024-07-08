<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\AttachmentForItem;
use App\Models\AttachmentType;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivesController extends Controller
{
    public function index($pid)
{
    $pid = (int)$pid;
    $project = Project::find($pid);
    $items = AttachmentForItem::all();
    $types = AttachmentType::where('name', 'PDF')->orWhere('name', 'LINK')->get();

    $archives = Attachment::where('attachment_for_item_id', AttachmentForItem::PROJECT)
        ->where('related_id', $pid)
        ->with([
            'item',
            'user' => function ($query) {
                $query->withTrashed(); // Eager load soft-deleted users
            },
            'user.role',
            'type'
        ])->paginate(50);
        // dd($archives);
    return view('pages.dashboard.archives.index', compact('project', 'types', 'archives'));
}



    public function store(Request $request, $pid)
    {
        $items = AttachmentForItem::all();
        $types = AttachmentType::where('name', '=', 'PDF')->orWhere('name', '=', 'LINK')->get();
    
        $pid = (int)$pid;
    
        $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|exists:attachment_types,id',
            'description' => 'nullable|string',
        ]);
    
        try {
            $attachment = new Attachment();
            $attachment->name = $request->name;
            $attachment->related_id = $pid;
            $attachment->attachment_for_item_id = AttachmentForItem::PROJECT;
            $attachment->attachment_type_id = (int)$request->type;
            $attachment->description = $request->description;
            $attachment->user_id = auth()->user()->id;
    
            if ($request->hasFile('pdf')) {
                $request->validate([
                    'pdf' => 'required|file|mimes:pdf|max:25000', // 25 MB limit for PDFs
                ]);
    
                $file = $request->file('pdf');
                if ($file->isValid()) {
                    $extension = $file->extension();
                    $fileName = time() . '_' . uniqid('', true) . '.' . $extension;

                    
                     // Determine file storage path based on file type
                $storagePath = 'public/pdf_attachments'; // Store in 'public' disk under 'pdf_attachments' folder

                // Store file in public disk
                $storedPath = $file->storeAs($storagePath, $fileName, 'public');

                    // Save file details to database
                    $attachment->filename = $fileName;
                    $attachment->file_dir = $storedPath;
                    $attachment->file_url = Storage::url($storedPath); // Assuming you're using local storage
                } else {
                    return redirect()->back()->with('error', 'Invalid file upload.');
                }
            } elseif ($request->filled('file_url')) {
                $request->validate([
                    'file_url' => 'required|url',
                ]);
    
                // Handle URL input
                $attachment->file_url = $request->file_url;
            } else {
                return redirect()->back()->with('error', 'Either file or URL must be provided.');
            }
    
            $attachment->save();
    
            return redirect()->back()->with('success', 'Archive uploaded successfully.');
        } catch (\Exception $e) {
            // Log detailed error message
            \Log::error('Attachment store error: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine());
    
            // Handle any errors
            return redirect()->back()->with('error', 'An error occurred while processing the archive. Please try again provide the right PDF files max 20MB or url.');
        }
    }
    

    public function destroy($pid, $id)
    {
        $pid = (int)$pid;
        $id = (int)$id;
        try {
            $attachment = Attachment::findOrFail($id);

            // Check if attachment type is "PDF" for permanent deletion
            if ($attachment->type->name === 'PDF') {
                // Delete file from storage
                Storage::delete($attachment->file_dir);
            }

            // Delete attachment from database
            $attachment->forceDelete();

            return redirect()->back()->with('success', 'Archive permanently deleted.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete archive.');
        }
    }
}

